<style>

main{
	--_bg-size:var(--bg-size,40%);
	background-image: url("../../../img/nodata.svg");
	background-repeat: no-repeat, repeat;
  	background-position: center;
	background-size: contain;
	background-size: var(--_bg-size);
	height: calc(100% - var(--nav-height)*2);
	box-shadow: 0 0 0 0 transparent;
}
</style>

<data-empty class="no-data alert-warning" style="place-self:center;margin-top:10px;padding:0">

<div style="display:flex;align-items:center;padding:5px;"><x-icon type="warning" icon="warning"></x-icon>{{$slot}} </div>

</data-empty>
