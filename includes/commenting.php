<?php echo '<form action="'.processNewComment($id).'" method="post">'; ?>
<textarea name="comment" id="" cols="30" rows="4" placeholder="Írd ide a hozzászólásodat..." class="form-control"></textarea>
<?php echo '<input type="hidden" name="userid" value="'.$_SESSION['userId'].'">'; ?>
<?php echo '<input type="hidden" name="username" value="'.$_SESSION['userName'].'">'; ?>
<button type="submit" class="btn btn-success form-control" name="submit-comment">Küld</button>
</form>