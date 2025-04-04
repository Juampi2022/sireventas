document.addEventListener("DOMContentLoaded", function () {
  const clientForm = document.getElementById("clientForm");

  clientForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const clientId = document.getElementById("clientId").value;
    const formData = new FormData(clientForm);

    fetch(clientId ? "update_client.php" : "create_client.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        alert(data); // Show confirmation message
        clientForm.reset();
        loadClients();
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Hubo un error al registrar el cliente.");
      });
  });

  function loadClients() {
    fetch("read_clients.php")
      .then((response) => response.json())
      .then((clients) => {
        // Update the calendar and other modules with the received clients data
        console.log(clients);
      })
      .catch((error) => console.error("Error:", error));
  }

  loadClients();

  window.editClient = function (clientId) {
    fetch(`get_client.php?id=${clientId}`)
      .then((response) => response.json())
      .then((client) => {
        document.getElementById("name").value = client.name;
        document.getElementById("phone").value = client.phone;
        document.getElementById("origin").value = client.origin;
        document.getElementById("project").value = client.project;
        document.getElementById("eventType").value = client.eventType;
        document.getElementById("nextEventDate").value = client.nextEventDate;
        document.getElementById("horaVisita").value = client.horaVisita;
        document.getElementById("observation").value = client.observation;

        document.getElementById("clientId").value = client.id;
      })
      .catch((error) => console.error("Error:", error));
  };

  window.deleteClient = function (clientId) {
    if (confirm("¿Está seguro de eliminar este cliente?")) {
      const formData = new FormData();
      formData.append("id", clientId);

      fetch("delete_client.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert(data); // Show confirmation message
          loadClients();
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("Hubo un error al eliminar el cliente.");
        });
    }
  };
});
