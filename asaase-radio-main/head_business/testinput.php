<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>
  </head>
  <body>
    <form class="" action="" method="post">
      <p> Input: Yes <input type="radio" name="budget" value="Yes" required> No <input type="radio" name="budget" value="No" required> </p>
      <p class="preason"> Reason: <input type="text" name="reason" value="" class="reason"> </p>
      <p> <button type="submit" name="button">Submit</button> </p>
    </form>
  </body>
</html>
<script>
$(function () {
  $('.preason').hide();
  $('.reason').hide();

  $("input[name=budget]:radio").click(function () {
      if ($('input[name=budget]:checked').val() == "Yes") {
          $('.preason').hide();
          $('.reason').hide();
          $('.reason').attr('required', false);
      }
      else if ($('input[name=budget]:checked').val() == "No") {
          $('.preason').show();
          $('.reason').show();
          $('.reason').attr('required', true);
      }
      else if ($('input[name=budget]:unchecked')) {
        $('.preason').hide();
        $('.reason').hide();
        $('.reason').attr('required', false);
      }
  });
});
</script>
