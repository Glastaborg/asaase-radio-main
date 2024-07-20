<?php
  session_start();
  include('../connection.php');
  include('includes/auth.php');
  include('assets/add.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asaase Radio || Department Head Add Activity </title>
    <!-- CSS Links-->
    <?php include("../includes/includes_css.php"); ?>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>

    <style type="text/css">
    /* bring in the claro theme */
    @import "//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dijit/themes/claro/claro.css";
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js"
    data-dojo-config="async: true, parseOnLoad: true"> </script>
    <script>
        // Load the editor resource
        require(["dijit/Editor", "dojo/parser"]);
    </script>
  </head>
  <body class="has-background-light claro">
    <div class="columns">
      <?php include('includes/sidebar.php'); ?>
      <div class="column is-10 has-background-light" id="main">
        <?php include('includes/navbar.php'); ?>
        <nav class="breadcrumb p-3" aria-label="breadcrumbs">
          <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> &nbsp; Dashboard</a></li>
            <li ><a href="vacancy.php" aria-current="page">Vacancy</a></li>
            <li class="is-active"><a href="#" aria-current="page">Add Vacancy</a></li>
          </ul>
        </nav>
        <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
            <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
              <h1 class="title is-size-5">Add Vacancy</h1>
            </div>

            <div class="column is-full ">
              <form class="columns is-multiline" action="" method="post" enctype="multipart/form-data">
                <div class="column is-half">
                  <div class="field">
                    <label class="label"> Vacancy Title <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="text" class="input" name="vacancy_title" placeholder="Enter vacancy title" require >
                    </div>
                  </div>
                  <div class="field">
                    <label class="label"> Vacancy Deadline <span class="has-text-danger">*</span></label>
                    <div class="control">
                      <input type="date" class="input" name="vacancy_end_date"  require >
                    </div>
                  </div>
                  <div class="field">
                      <label class="label">Job Description <span class="has-text-danger">*</span></label>
                      <div class="control" style="min-height:40px;">
                        <textarea style="min-height:40px;"  name="vacancy_desc" rows="5" placeholder="Enter request" id="vacancy_desc" ></textarea>
                      </div>
                  </div>
                  <div class="field">
                      <label class="label">Job Responsibilities / Duties <span class="has-text-danger">*</span></label>
                      <div class="control" style="min-height:40px;">
                        <textarea style="min-height:40px;"  name="vacancy_resp" rows="5" placeholder="Enter request" id="vacancy_resp" ></textarea>
                      </div>
                    </div>
                  
                  <div class="field is-grouped my-5">
                    <p class="control is-expanded is-size-6"></p>
                    <p class="control">
                      <button class="button is-info" name="add_vacancy">
                        &nbsp; Save &nbsp;
                      </button>
                    </p>
                  </div>


                </div>

                <div class="column is-half">
                    
                    <div class="field">
                      <label class="label">Job Qualifications / Skills <span class="has-text-danger">*</span></label>
                      <div class="control" style="min-height:40px;">
                        <textarea style="min-height:40px;"  name="vacancy_qual" rows="5" placeholder="Enter request" id="vacancy_qual" ></textarea>
                      </div>
                    </div>
                </div>

              </form>
            </div>


        </div>
      </div>
    </div>
  </body>
</html>

<script>
//Sidebar Menu
function sideBar() {
   var aside = document.getElementById("aside");
   aside.classList.toggle("active");
}
</script>
<script>
    // Load the editor resource
    require(["dijit/Editor", "dojo/domReady!"], function(Editor){
        // Make our editor
        var editor = new Editor({
            plugins: ["bold","italic","|","cut","copy","paste","|","insertUnorderedList"]
        }, "vacancy_desc");
        editor.startup();
    });

    // Load the editor resource
    require(["dijit/Editor", "dojo/domReady!"], function(Editor){
        // Make our editor
        var editor = new Editor({
            plugins: ["bold","italic","|","cut","copy","paste","|","insertUnorderedList"]
        }, "vacancy_resp");
        editor.startup();
    });
    
    // Load the editor resource
    require(["dijit/Editor", "dojo/domReady!"], function(Editor){
        // Make our editor
        var editor = new Editor({
            plugins: ["bold","italic","|","cut","copy","paste","|","insertUnorderedList"]
        }, "vacancy_qual");
        editor.startup();
    });
</script>
