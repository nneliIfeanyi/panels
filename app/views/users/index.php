<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="header mb-5">
    <div class="container mt-5">
         <h1 class="mb-3"><?php echo $data['title']?></h1>
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
               <form action="<?php echo URLROOT;?>/users" method="post">
                    <div class="input-group mb-2">
                      <input type="text" class="form-control" name="search" placeholder="Search Users...">
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
            <div class="row">
            <?php foreach($data['all_users'] as $user) : ?>
                <div class="col-md-4">
                    <div class="card mb-3 border-light shadow">
                        <div class="card-body" data-bs-toggle="tooltip" data-bs-title="<?php echo $user->email ?>">
                            <div class="d-flex gap-3">
                                <div class="user-img">
                                    <img src="<?= URLROOT.'/'.$user->photo;?>" style="height: 100px;width:95px;border-radius: 50%;">
                                </div>
                                <div class="user-info">
                                    <h4><?php echo $user->name ?></h4>
                                    <div><span class="badge bg-primary"><i class="fa fa-phone" arai-hidden="true"></i></span>
                                    <span class="text-secondary"> <?php echo $user->phone ?></span></div>
                                    <div><span class="badge bg-primary"><i class="fa fa-map-marker" arai-hidden="true"></i></span>
                                    <span class="text-secondary"> <?php echo $user->address ?></span></div>
                                    <span class="badge bg-secondary"> <?php echo $user->region ?></span>
                                </div>

                            </div>
                             <p class="lead py-2 text-center">Joined <?php echo $user->joined_at ?></p>
                             <div class="d-grid">
                                <a class="btn btn-outline-secondary" href="<?php echo URLROOT;?>/users/assets/<?php echo $user->id;?>"><i class="fa fa-eye"></i> Veiw <?php echo $user->name; ?>'s Posts</a>
                             </div>
                        </div>
                       
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <div class="fs-3 text-center fw-bold mb-2">...</div>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>