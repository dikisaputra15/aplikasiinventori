<script>
  function editdata(data)
  {
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/edit_process.php?op=getdata&id=" + data;
    xmlHttp.onreadystatechange = function() 
    {
      if(xmlHttp.readyState == 4)
      {
        let res = xmlHttp.responseText;
        let resJson = JSON.parse(res);
        document.getElementById("e_nama_customer").value = resJson.nama_customer;
        document.getElementById("e_email").value = resJson.email;
        document.getElementById("e_alamat").value = resJson.alamat;
        document.getElementById("e_no_hp").value = resJson.no_hp;
        document.getElementById("e_id_customer").value = resJson.id_customer;
      }
    }
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
  }


  function getDataCustomer()
  {
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/index_process.php";
    xmlHttp.onreadystatechange = function()
    {
      if(xmlHttp.readyState == 4)
      { 
        let resJson = JSON.parse(xmlHttp.responseText);
        let dataCustomer = "";
        for(let dataJson = 0; dataJson < resJson.length; dataJson++)
        {
          dataCustomer += "<tr>"+
                                "<td>"+ resJson[dataJson].id_customer +"</td>"+ 
                                "<td>"+ resJson[dataJson].nama_customer +"</td>"+
                                "<td>"+ resJson[dataJson].alamat +"</td>"+
                                "<td>"+ resJson[dataJson].email +"</td>"+
                                "<td>"+ resJson[dataJson].no_hp +"</td>"+
                                "<td><div class='btn-group'>"+
                                "<button type='button' class='btn btn-success btn-sm' onclick='editdata("+ resJson[dataJson].id_customer +")' data-toggle='modal' data-target='#modal-default1'><i class='fa fa-edit'></i></button>"+
                                "<button type='button' class='btn btn-danger btn-sm' onclick='deleteDataCustomer("+ resJson[dataJson].id_customer +")'><i class='fa fa-trash'></i></button>"+
                                "</div></td>"+
                            "</tr>";
        }
        
        document.getElementById("datatest").innerHTML = dataCustomer;
      }
    }
    xmlHttp.open("GET",url,true);
    xmlHttp.send();
  }

  function kirimdDataCustomer()
  {
    let namaCustomer = document.getElementById("nama_customer").value;
    let email = document.getElementById("email").value;
    let alamat = document.getElementById("alamat").value;
    let noHp = document.getElementById("no_hp").value;
    let customer = "customer";
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/create_process.php";
    let param = "create=" + customer + "&namaCustomer=" + namaCustomer + "&email=" + email + "&alamat=" + alamat + "&noHp=" + noHp ;
    xmlHttp.onreadystatechange = function() 
    {
      if(xmlHttp.readyState == 4)
      {
        let res = xmlHttp.responseText;
        document.getElementById("message").innerHTML = res;
        getDataCustomer();
      }
    }
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(param);
  }

  function updateDataCustomer()
  {
    let e_id_customer = document.getElementById("e_id_customer").value;
    let e_nama_customer = document.getElementById("e_nama_customer").value;
    let e_email = document.getElementById("e_email").value;
    let e_alamat = document.getElementById("e_alamat").value;
    let e_no_hp = document.getElementById("e_no_hp").value;
    let customer = "customer";
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/update_process.php";
    let param = "create=" + customer + "&namaCustomer=" + e_nama_customer + "&email=" + e_email + "&alamat=" + e_alamat + "&noHp=" + e_no_hp + "&id=" + e_id_customer ;

    xmlHttp.onreadystatechange = function() 
    {
      let res = xmlHttp.responseText;
      document.getElementById("message-update").innerHTML = res;
      getDataCustomer(); 
    }
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(param);
  }

  function deleteDataCustomer(id)
  {
    let xmlHttp = new XMLHttpRequest();
    let customer = "customer";
    let url = "modul/customer/delete_process.php";
    let param = "delete=" + customer + "&id=" + id;

    xmlHttp.onreadystatechange = function()
    {
      let res = xmlHttp.responseText;
      document.getElementById("message-delete").innerHTML = "<div class='alert alert-warning alert-dismissible'>"+
        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
        "<span >None</span>"+
      "</div>";
      getDataCustomer(); 
    }

    xmlHttp.open("POST",url, true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(param);
  }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Customer
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer</a></li>
        <li class="active">Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- modals -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Data Customer</h4>
          </div>
          <div class="modal-body">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span id="message">None</span>
              </div>
              <div class="form-group">
                <label for="nama_customer">Nama</label>
                <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Telp</label>
                <input type="text" class="form-control" id="no_hp" nama="no_hp" placeholder="Enter nomor telepon">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="kirimdDataCustomer()">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-default1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Data Customer</h4>
          </div>
          <div class="modal-body">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span id="message-update">None</span>
              </div>
              <div class="form-group">
                <label for="e_nama_customer">Nama</label>
                <input type="hidden" class="form-control" name="e_id_customer" id="e_id_customer" placeholder="Enter id">
                <input type="text" class="form-control" name="e_nama_customer" id="e_nama_customer" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="e_email">Email address</label>
                <input type="email" class="form-control" id="e_email" name="e_email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="e_alamat" id="e_alamat" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Telp</label>
                <input type="text" class="form-control" id="e_no_hp" nama="e_no_hp" placeholder="Enter nomor telepon">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateDataCustomer()">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data
              </button>
              <button type="button" class="btn btn-success" onclick="getDataCustomer()">
                Refresh
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12" id="message-delete">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Nomor HP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="datatest">
                <?php 
                    $select = mysqli_query($conn, "select * from customer");
                    while($data = mysqli_fetch_object($select)){
                      echo "<tr>".
                            "<td>".$data->id_customer."</td>".
                            "<td>".$data->nama_customer."</td>".
                            "<td>".$data->alamat."</td>".
                            "<td>".$data->email."</td>".
                            "<td>".$data->no_hp."</td>".
                            "<td>
                              <div class='btn-group'>
                              <button type='button' class='btn btn-success btn-sm' onclick='editdata($data->id_customer)' data-toggle='modal' data-target='#modal-default1'><i class='fa fa-edit'></i></button>
                              <button type='button' class='btn btn-danger btn-sm' onclick='deleteDataCustomer($data->id_customer)'><i class='fa fa-trash'></i></button>
                              </div>
                            </td>".
                            "</tr>";
                    }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>