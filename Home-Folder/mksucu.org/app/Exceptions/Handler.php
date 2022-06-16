<?php

namespace App\Exceptions;

use Log;
use Throwable;
use App\Traits\WebResponser;
use App\Traits\ApiResponser;
use Swift_TransportException;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\ErrorHandler\Exception\FlattenException;


class Handler extends ExceptionHandler
{
  use WebResponser,ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
       \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
      ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
      // emails.exception is the template of your email
      // it will have access to the $error that we are passing below

      $this->reportable(function (QueryException $exception)
      {
        
        if ($exception->errorInfo[1]==1054)
        {
          $this->sendEmail($exception); // sends an email
          //return $this->errorResponse($error);
          return $this->errorResponse('error','Missing Field Detected. Don\'t Worry A Notification has been sent to the Developer');
        }

        if ($exception->errorInfo[1]==1146)
        {
          $error = $exception->getMessage();

          return $this->errorResponse('error',$error);
        }

    });

    }

    public function render($request, Throwable $exception)
    {
      //ModelNotFoundException
        if ($exception instanceof ModelNotFoundException)
        {
          $modelName=strtolower(class_basename($exception->getModel()));

          return $this->errorResponse('error','The '.$modelName.' in reference is not found');
        }


        //MethodNotAllowedHttpException
        if ($exception instanceof MethodNotAllowedHttpException)
         {
           return $this->errorResponse('error',$exception->getMessage());
        }

        //ValidationException
        if ($exception instanceof ValidationException )
        {
          return $this->convertValidationExceptionToResponse($exception,$request);
        }
        //TokenMismatchException
        if ($exception instanceof TokenMismatchException )
        {
          return redirect()->back()->withInput($request->input());
        }
        //AuthenticationExceptions
        if ($exception instanceof AuthenticationException )
        {
          return $this->unauthenticated($request,$exception);
        }
        //AuthorizationException
        if ($exception instanceof AuthorizationException)
         {
           return $this->errorResponse('error',$exception->getMessage());
        }
        //NotFoundHttpException
        if ($exception instanceof NotFoundHttpException)
         {
            return $this->errorResponse('warning','The specified url cannot be found. Please take another look..');
         }

        //Generic HttpException
        if ($exception instanceof HttpException)
        {
          return $this->errorResponse('error',$exception->getMessage());
         }
            //Swift_TransportException
        if ($exception instanceof Swift_TransportException)
         {
           return $this->errorResponse('error','Email Network Connection Service Error. Please Try Again Later.');
           }

        //Generic QueryException
        if ($exception instanceof QueryException)
        {
          if ($exception->errorInfo[1]==1406)
          {
            return $this->errorResponse('warning','Please Shorten your Message...');
          }

          if ($exception->errorInfo[1]==1146)
          {
            return response()->view('errors.migration-404');
          }

          if ($exception->errorInfo[1]==1062)
          {
            return $this->errorResponse('warning','Already Exists');
          }

            if($exception->errorInfo[1]==1451)
            {
               return $this->errorResponse('error','Cannot remove this Resource Permanently. It is related to another resource');
            }
           if(config('app.debug'))
           {
             return parent::render($request,$exception);
           }
           return $this->errorResponse('error','This is Unexpected Exception. Please Try again Later');
        }

      }

      public function sendEmail(Throwable $exception)
        {
           try {
                $e = FlattenException::create($exception);
                $handler = new HtmlErrorRenderer(true); // boolean, true raises debug flag...
                $css = $handler->getStylesheet();
                $content = $handler->getBody($e);

                \Mail::send('emails.exception', compact('css','content'), function ($message) {
                    $message->to([env('DEVELOPER_EMAIL'),'douglasmutethia2017@gmail.com'])
                                        ->subject('Exception: ' . \Request::fullUrl());
                });
            } catch (Throwable $exception) {
                Log::error($exception);
            }
        }


        protected function convertValidationExceptionToResponse(ValidationException $e,$request)
        {
          $errors=$e->validator->errors()->getMessages();

         return back()->withInput($request->input())->withErrors($errors);
       }

    /**
     * Convert an authenticated exception into an authenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Middleware\Authenticate\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */

     protected function unauthenticated($request,AuthenticationException $exception)
     {


       if ($this->isFrontend($request))
        {
          return redirect()->guest('login');
       }
      return $this->errorResponse('error','Authentication Failed');
     }

     private function isFrontend($request)
     {
       return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
     }

}
