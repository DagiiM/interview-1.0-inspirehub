<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
#members {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#members td, #members th {
  border: 1px solid #ddd;
  padding: 8px;
}

#members tr:nth-child(even){background-color: #f2f2f2;}

#members tr:hover {background-color: #ddd;}

#members th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
 /* background-color: #04AA6D;*/
  color: white;
  background-color: #7E8FE7;
}

.page-break {
    page-break-after: always;
}
.table{
  font-size: 0.8rem !important;
   border-collapse: collapse;
}
.table td{
  padding: .35rem !important;
  text-transform:lowercase;
  border-bottom: 1px solid #eee;
  margin-right: 3%;
}
.table td::first-letter{
  text-transform:uppercase;
}
</style>
</head>
<body>
<center>

<h5 class="mb-3" style="text-align:center;margin-bottom:10px;color: #7E8FE7;text-transform:uppercase">{{$ministry->name}} Members - {{config('app.name')}}</h5>
<p style="font-style:italic;font-size:17px">"{{$ministry->description}}"</p>
<table id="members" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
    <tbody>{{$userid=1}}
@foreach($users as $user)
  <tr>
      <td>{{$userid++}} </td>
      <td>{{$user->firstname}}</td>
      <td>{{$user->lastname}}</td>
      <td >{{$user->email}}</td>
      <td>{{$user->mobile}}</td>

    </tr>
@endforeach
  </tbody>
</table>
<!--    <p style="color:#04AA6D">--End of file--</p>  -->
<p style="color:#7E8FE7;position:fixed;bottom:0;right:48%">--End of file--</p>
</center>

<div class="page-break"></div> 

</body>
</html>
