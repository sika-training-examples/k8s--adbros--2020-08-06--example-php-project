<style>
body {
  background: lightblue;
}
</style>
<script>
  fetch("<?php echo getenv('API_URL'); ?>", {
    headers: { "Content-Type": "application/json" },
  }).then((response) => {
    response.json().then((content) => {
      document.body.innerHTML = content.counter;
    });
  });
</script>
