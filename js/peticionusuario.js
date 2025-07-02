const cbxcomplejo = document.getElementById("complejo");
cbxcomplejo.addEventListener("change", getplanta);

const cbxplanta = document.getElementById("planta");

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

function getplanta() {
  let complejo = cbxcomplejo.value;
  let url = " ../config/getplanta.php";
  let formData = new FormData();
  formData.append("complejo", complejo);

  fetchandsetdata(url, formData, cbxplanta);
}
