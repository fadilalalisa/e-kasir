<script>
    function hapus(id_supplier)
    {
        pesan = confirm('Yakin hapus data supplier?');

        if(pesan) {
            window.location.href=("<?= base_url('supplier/delete') ?>") + id_supplier;

        } else return false;
    }