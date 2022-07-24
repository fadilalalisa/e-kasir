    <!-- Modal -->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modaltambahLabel">Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('supplier/simpandata', ['class' => 'formuser']); ?>
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier">
                            <div class="invalid-feedback errorNama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <div class="invalid-feedback errorEmail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">No telp</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="telepon" name="telepon">
                            <div class="invalid-feedback errorPassword">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //focus pada input
                $('body').on('shown.bs.modal', '#modaltambah', function() {
                    $('input:visible:enabled:first', this).focus();
                })
                $('.formuser').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            $('.btnsimpan').attr('disable', 'disabled');
                            $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i> Proses');
                        },
                        complete: function() {
                            $('.btnsimpan').removeAttr('disable');
                            $('.btnsimpan').html('Simpan');
                        },
                        success: function(response) {
                            //klo ada error
                            if (response.error) {
                                //error nama
                                if (response.error.nama) {
                                    $('#nama').addClass('is-invalid');
                                    $('.errorNama').html(response.error.nama);
                                } else {
                                    $('#menu').removeClass('is-invalid');
                                    $('.errorMenu').html('');
                                }
                                //error email
                                if (response.error.email) {
                                    $('#email').addClass('is-invalid');
                                    $('.errorEmail').html(response.error.email);
                                } else {
                                    $('#link').removeClass('is-invalid');
                                    $('.errorLink').html('');
                                }
                                //error password
                                if (response.error.password) {
                                    $('#password').addClass('is-invalid');
                                    $('.errorPassword').html(response.error.password);
                                } else {
                                    $('#password').removeClass('is-invalid');
                                    $('.errorPassword').html('');
                                }
                            } //sukses
                            else {
                                //pesan sukses bro
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.sukses
                                });
                                //hide modal tambah data
                                $('#modaltambah').modal('hide');
                                //load data menu
                                datauser();
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                    return false;
                });
            });
        </script>