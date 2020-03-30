<?php include('templates/header.php') ?>
<?php include('templates/navbar.php') ?>
<?php include('includes/home-inc.php') ?>

<div class="container mt-4">
  <div class="container py-3">
    <div class="row">
      <div class="ml-auto col-lg-3 col-sm-4 py-2">

        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item p-2 list-group-item-action active" data-toggle="list" href="#list1" role="tab">
            <img class="img-fluid rounded-circle bg-warning" src="//robohash.org/ags.png?size=35x35"> Violation
          </a>
          <a class="list-group-item p-2 list-group-item-action" data-toggle="list" href="#list2" role="tab">
            <img class="img-fluid rounded-circle bg-danger" src="//robohash.org/454.png?size=35x35"> Student
          </a>
          <a class="list-group-item p-2 list-group-item-action" data-toggle="list" href="#list3" role="tab">
            <img class="img-fluid rounded-circle bg-info" src="//robohash.org/cds.png?size=35x35"> College
          </a>
          
        </div>
      </div>
      <div class="mr-auto col-lg-7 col-sm-8 py-2">
        <div class="tab-content">
          <div class="tab-pane active" id="list1" role="tabpanel">
            <h4>VIOLATION</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur dolor corrupti quam hic culpa. Laudantium illo rerum molestias consequatur tempora. Doloribus esse debitis ipsa ipsum sunt sapiente id porro iste nulla soluta exercitationem dolorum, mollitia consequatur qui sed vero? Similique velit adipisci, alias facilis rerum quisquam architecto inventore nostrum necessitatibus.</p>
          </div>
          <div class="tab-pane" id="list2" role="tabpanel">
            <h4>STUDENT</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In incidunt iusto ea. Deleniti perferendis eum veniam et sit corporis, accusantium quod eius reprehenderit recusandae facilis a maiores totam eaque doloribus sapiente deserunt, voluptatibus eveniet corrupti, enim culpa. Sed obcaecati amet fuga, eligendi assumenda numquam odit explicabo ullam fugiat, totam maxime.</p>
          </div>
          <div class="tab-pane" id="list3" role="tabpanel">
            <h4>COLLEGE</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. At maxime beatae iure nam recusandae. Nostrum delectus, at dolore voluptas unde tempore temporibus sequi praesentium modi non sit mollitia quas magni corrupti cumque debitis aperiam inventore voluptatibus distinctio quia. Beatae dolorum eligendi enim, ipsa omnis vel fugit officia animi modi consectetur!</p>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('templates/footer.php') ?>