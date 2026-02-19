jQuery(document).ready(function ($) {
  $("#appointment-department").on("change", function () {
    const departmentId = $(this).val();
    const doctorSelect = $("#appointment-doctor");

    doctorSelect.prop("disabled", true);
    doctorSelect.html("<option>Loading doctors...</option>");

    if (!departmentId) {
      doctorSelect.html('<option value="">Select Doctor</option>');
      return;
    }

    $.ajax({
      url: ahudimmaAjax.ajax_url,
      type: "POST",
      data: {
        action: "load_doctors_by_department",
        department_id: departmentId,
        nonce: ahudimmaAjax.nonce,
      },
      success: function (response) {
        if (response.success) {
          doctorSelect.prop("disabled", false);
          doctorSelect.html('<option value="">Select Doctor</option>');

          response.data.forEach(function (doctor) {
            doctorSelect.append(
              `<option value="${doctor.id}">${doctor.name}</option>`
            );
          });
        } else {
          doctorSelect.html("<option>No doctors found</option>");
        }
      },
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".appointment-form");
  const submitBtn = document.querySelector(".appointment-submit");

  form.addEventListener("submit", function () {
      submitBtn.disabled = true;
      submitBtn.innerText = "Processing...";
  });
});
