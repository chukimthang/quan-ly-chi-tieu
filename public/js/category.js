function category() {
  var current = this;

  this.init = function(url) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    current.add();
    current.update();
    current.delete();
  }

  this.add = function() {
    $('#category-create').on('click', '.btn.btn-primary', function() {
      var dataName = $('#category-name').val();
      $.ajax({
        url: url.add,
        type: 'POST',
        dataType: 'json',
        data: {
          name: dataName
        }
      })
      .done(function(data) {
        swal("Đã thêm!", "Thêm thành công", "success");
        $('.modal').modal('hide');
      })
      .fail(function(data) {
        var errors = '';
        $('.form-error').html('');
        for(datos in data.responseJSON){
          errors += data.responseJSON[datos] + '<br>';
        }
        $('.form-error').show().html(errors);
      });
    });
  }

  this.update = function() {
    var dataId;
    $('#category-list').on('click', '.update', function() {
      dataId = $(this).data('id');
      var name = $('#name-' + dataId).html();
      $('#edit-name').val($.trim(name));
    });

    $('#category-edit').on('click', '.btn.btn-primary', function() {
      $.ajax({
        url: url.update,
        type: 'POST',
        dataType: 'json',
        data: {
          id: dataId,
          name: $('#edit-name').val()
        }
      })
      .done(function() {
        swal("Đã Cập Nhật!", "Cập nhật thành công", "success");
        $('.modal').modal('hide');
      })
      .fail(function(data) {
        var errors = '';
        $('.form-error').html('');
        for(datos in data.responseJSON){
          errors += data.responseJSON[datos] + '<br>';
        }
        $('.form-error').show().html(errors);
      });
      $('#name-' + dataId).html($('#edit-name').val());
    });
  }

  this.delete = function() {
    $('#category-list').on('click', '.delete', function() {
      var dataId = $(this).data('id');
      $.ajax({
        url: url.delete,
        type: 'POST',
        data: {
          id: dataId
        }
      })
      .done(function() {
        swal("Đã Xóa!", "Xóa thành công", "success");
      });
      $(this).parent().parent().remove();
    });
  }
}
