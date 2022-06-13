<option value="">select</option>
<?php foreach ($select AS $d): ?>
<option value="<?php echo $d->id; ?>"><?php echo $d->nom ?></option>
<?php endforeach; ?>