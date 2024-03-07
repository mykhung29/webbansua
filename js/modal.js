const modaloff = document.querySelector(".showModalBtn");
const modal = document.querySelector(".modal");
modaloff.addEventListener("click", function () {
  modal.style.display = "flex";

  setTimeout(function () {
    modal.style.display = "none";
  }, 3000);
});

function confirmDelete(e) {
  if (confirm("Bạn có muốn xóa hay không?")) {
    // Nếu người dùng đồng ý xóa, thực hiện yêu cầu xóa thông qua PHP
    window.location.href = "cart.php";
  } else {
    e.preventDefault();
  }
}

function confirmSignout(e) {
  if (confirm("Bạn có muốn đăng xuất hay không?")) {
  } else {
    e.preventDefault();
  }
}
