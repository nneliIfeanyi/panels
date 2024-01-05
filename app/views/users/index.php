<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav2.php'; ?>
<div class="header mb-5">
    <div class="container mt-5">
         <h1 class="mb-3">Users</h1>
            <!-- <div class="col user-menu d-flex justify-content-end align-items-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Reputation</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">New users</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Editors</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Moderators</a>
                    </li>
                </ul>
            </div> -->
       
        <div class="row">
            <div class="col-md-4">
               <form action="#" method="get" class="">
                    <div class="input-group mb-2">
                      <input type="text" class="form-control" name="surname" placeholder="Search Users...">
                      <button type="submit" class="input-group-text px-3 bg-primary text-light">
                        <i class="fa fa-fw fa-search text-white"></i> Search
                      </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
    <main>
        <div class="container">
            <div class="row">
            <?php foreach($data['all_users'] as $user) : ?>
                <div class="col-md-4">
                    <div class="card mb-3 border-light shadow" style="height: 250px;">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="user-img">
                                     <img src="<?= URLROOT.'/'.$user->photo;?>" style="height: 140px;border-radius: 50%;"></a>
                                </div>
                                <div class="user-info">
                                    <h4><?php echo $user->name ?></h4>
                                    <h6>location</h6>
                                    <span class="badge bg-primary">software</span>
                                    <span class="badge bg-primary">hardware</span>
                                    <span class="badge bg-primary">Both</span>
 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>