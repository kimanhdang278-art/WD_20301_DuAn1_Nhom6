</div>
</div>
<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/sidebarmenu.js"></script>
<script src="./assets/js/app.min.js"></script>
<script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="./assets/libs/simplebar/dist/simplebar.js"></script>
<script src="./assets/js/dashboard.js"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
<script>
  new FroalaEditor("textarea#editor");
</script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
  Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function (file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
    }
  };
</script>
</body>

</html>