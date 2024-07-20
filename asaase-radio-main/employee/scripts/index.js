//Sidebar Menu
function sideBar() {
  var aside = document.getElementById("aside");
  aside.classList.toggle("active");
}

//Search  Function
$(document).ready(function () {
  $("#search").on("keyup", function () {
    var searchTerm = $(this).val().toLowerCase();
    $("#table tbody tr").each(function () {
      var lineStr = $(this).text().toLowerCase();
      if (lineStr.indexOf(searchTerm) === -1) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  });
});

$("#reason").on("change", function () {
  if ($(this).val() == "Maternity Leave") {
    $("#duration").text(
      "Notice : The Duration for Maternity leave is three(3) months. "
    );
    $("#end_date").prop("readonly", true);
  } else if ($(this).val() == "Paternity Leave") {
    $("#duration").text(
      "Notice : The Duration for Paternity leave is five(5) working days. "
    );
    $("#end_date").prop("readonly", true);
  } else {
    $("#duration").text("");
    $("#end_date").prop("readonly", false);
  }
});

$("#start_date").on("change", function () {
  if ($("#reason").val() == "Maternity Leave") {
    setDuration($(this).val(), 3, "months");
  } else if ($("#reason").val() == "Paternity Leave") {
    setDuration($(this).val(), 5, "days");
  }
});

//first argument takes the start date of the leave
//second argument takes the number of either days, years, months
//third argument takes duration whether months, years or days
function setDuration(start, number, duration) {
  let startDate = moment(start, "YYYY-MM-DD").format("YYYY-MM-DD");
  let endDate = moment(startDate).add(number, duration).format("YYYY-MM-DD");

  $("#end_date").prop("readonly", true);
  $("#end_date").val(endDate);

  console.log(endDate);
}

// function addWorkingDays(date, days) {
//   let start_date = moment(date, "YYYY-MM-DD").format("YYYY-MM-DD");

//   while (days > 0) {
//     date = moment(start_date).add(1, "days").format("YYYY-MM-DD");

//     if (
//       new Date(end_date).getDay() !== 0 &&
//       new Date(end_date).getDay() !== 6
//     ) {
//       // 0 = Sunday, 6 = Saturday
//       days--;
//     }
//   }
//   $("#end_date").prop("readonly", true);
//   $("#end_date").val(date);

//   //   return date;
// }
