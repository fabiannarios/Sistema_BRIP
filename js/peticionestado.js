const cbxequipo = document.getElementById("equipo");
cbxequipo.addEventListener("change", getestados);

const cbxestado = document.getElementById("estado");

function fetchandsetdata(url, formData, targetElement) {
  return fetch(url, {
    method: "POST",
    body: formData,
    mode: "cors",
  })
    .then((Response) => Response.json())
    .then((data) => {
      targetElement.innerHTML = data;
    })
    .catch((err) => console.log(err));
}

function getestados() {
  let equipo = cbxequipo.value;
  let url = "config/getestados.php";
  let formData = new FormData();
  formData.append("equipo", equipo);

  fetchandsetdata(url, formData, cbxestado);
}
