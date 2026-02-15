document.addEventListener("DOMContentLoaded", function () {
  const departmentSelect = document.querySelector("#department-filter");
  const resultContainer = document.querySelector(".doctor-results");

  departmentSelect.addEventListener("change", function () {
    const department = this.value;
    fetchDoctors(department)
  });

  // Function to get the doctors for a specific department
  function fetchDoctors(department) {
    const formData = new FormData();
    formData.append('action', 'filtered_doctors')
    formData.append('departmnt', department)

    fetch(ulo_ajax.ajax_url, {
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
