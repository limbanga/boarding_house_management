$(document).ready(function() {
  $("#roomForm").submit(function(e) {
      e.preventDefault();
      let id = $("#room_id").val();
      let name = $("#room_name").val();
      let price = $("#room_price").val();
      let status = $("#room_status").val();

      let action = id ? "update" : "add";
      $.post(`/api.php?action=${action}`, { id, name, price, status }, function() {
          location.reload();
      }, "json");
  });

  $(".btn-edit").click(function() {
      $("#room_id").val($(this).data("id"));
      $("#room_name").val($(this).data("name"));
      $("#room_price").val($(this).data("price"));
      $("#room_status").val($(this).data("status"));
  });

  $(".btn-delete").click(function() {
      if (confirm("Bạn có chắc chắn muốn xóa phòng này?")) {
          let id = $(this).data("id");
          $.post("/api.php?action=delete", { id }, function() {
              location.reload();
          }, "json");
      }
  });
});
