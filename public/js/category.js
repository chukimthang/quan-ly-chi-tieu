function category() {
  var current = this;

  this.init = function(url) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    current.add();
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
