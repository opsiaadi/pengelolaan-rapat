<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Sistem Manajemen Rapat</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
  </head>

  <body
    class="bg-light"
    style="background: linear-gradient(rgb(8, 124, 170), rgb(112, 255, 172))"
  >
    <div
      class="container min-vh-100 d-flex justify-content-center align-items-center"
      id="loginPage"
    >
      <div
        class="card shadow-lg border-0 overflow-hidden"
        style="max-width: 850px; width: 100%"
      >
        <div class="row g-0">
          <div class="col-12 col-md-6 order-1 order-md-2">
            <img
              src="https://www.polibatam.ac.id/wp-content/uploads/2023/05/Gedung-1536x1024.jpg"
              alt="Gedung Polibatam"
              class="img-fluid w-100 h-100"
              style="object-fit: cover; object-position: center"
            />
          </div>

          <div
            class="col-12 col-md-6 d-flex justify-content-center align-items-center order-2 order-md-1 bg-white p-5"
          >
            <div class="w-100" style="max-width: 350px">
              <h2 class="text-center mb-3 fw-bold">Login</h2>
              <h5 class="text-center mb-4 fw-semibold">
                Sistem Manajemen Rapat
              </h5>
              <form id="loginForm">
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input
                    type="text"
                    id="username"
                    class="form-control"
                    placeholder="Masukkan username"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                  />
                </div>

                <div class="mb-3">
                  <label class="form-label">Login Sebagai</label>
                  <select id="role" class="form-select" required>
                    <option value="">Pilih peran</option>
                    <option value="admin">Admin</option>
                    <option value="peserta">Peserta</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  Login
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document
        .getElementById("loginForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const username = document.getElementById("username").value.trim();
          const password = document.getElementById("password").value.trim();
          const role = document.getElementById("role").value;

          // Contoh validasi login sederhana
          const validAdmin =
            username !== "" && password === "ROLEadmin123" && role === "admin";
          const validUser =
            username !== "" &&
            password === "ROLEpeserta123" &&
            role === "peserta";

          if (validAdmin || validUser) {
            alert("Login berhasil sebagai " + role + "!");
            // Simpan status ke localStorage
            localStorage.setItem("isLoggedIn", "true");
            localStorage.setItem("username", username);
            localStorage.setItem("role", role);

            // Arahkan ke dashboard
            window.location.href = "dashboard2.html";
          } else {
            alert("Username, password, atau peran salah!");
          }
        });
    </script>
  </body>
</html>

