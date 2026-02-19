document.addEventListener("DOMContentLoaded", function () {
  const departmentSelect = document.querySelector("#department-filter");
  const resultContainer = document.querySelector(".doctor-results");


  // console.log(departmentSelect)
  departmentSelect.addEventListener("change", function () {
    const department = this.value;
    fetchDoctors(department)
  });

  // Function to get the doctors for a specific department
  function fetchDoctors(department) {
    const formData = new FormData();
    formData.append('action', 'filter_doctors')
    formData.append('department', department)

    fetch(ahudimmaAjax.ajax_url, {
      method: "POST",
      body: formData
    })

    .then(response => response.text())
    .then(data => {
      resultContainer.innerHTML = data
    })

    .catch(error => {
      console.log('Error', error)
    })
  }
});
