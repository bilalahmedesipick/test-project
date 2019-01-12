<?php echo 'Hi'. $name. "<br>";

echo 'Your File is Attached '

?>
@if($size < 2)
<a class="btn btn-success" href="{{ app_path().$file }}">Download</a>
@endif
