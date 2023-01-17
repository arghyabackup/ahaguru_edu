<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'includes/header.php';
?>
<div class="container mt-2">
         <div class="row">
            <div class="col-md-12 mt-1 mb-4 text-center">
               <h2 class="text-white bg-dark p-3">Arghya Assignment</h2>
            </div>
            <div class="col-md-12 mt-1 mb-4 text-right">
                <button type="button" id="addNewUser" class="btn btn-success">Add Student</button>
            </div>
            <div class="col-md-12">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="20%">Email</th>
                        <th scope="col" width="15%">Mobile</th>
                        <th scope="col" width="15%">Class</th>
                        <th scope="col" width="30%" align="center">Action</th>
                     </tr>
                  </thead>
                  <tbody class="list_data">
                     <?php 
                     if($returns){
                     $i = 1;   
                     foreach($returns as $return){ ?>
                     <tr class="row_<?php echo $return['id'];?> post" data-id="<?php echo $return['id'];?>">
                        <td><?php echo $return['name'];?></td>
                        <td><?php echo $return['email'];?></td>
                        <td><?php echo $return['mobile'];?></td>
                        <td><?php echo $return['class'];?></td>
                        <td> 
                           <a href="javascript:void(0)" class="btn btn-info edit" data-id="<?php echo $return['id'];?>">Edit</a>
                           <a href="javascript:void(0)" onclick="delete_data(<?=$return['id']; ?>,'id','students');" class="btn btn-danger delete" data-id="<?php echo $return['id'];?>">Delete</a>
                     </tr>
                     <?php $i++; } }else{ ?>
                     <tr class="no_data">
                        <td colspan="3" rowspan="1" headers="">No Data Found</td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
            <?php if(get_data_count('students') > 6){ ?>
            <div class="col-md-12 mt-5 text-center">
                <a href="javascript:void(0)" class="load-more btn btn-primary">Load More</a>
                <input type="hidden" id="row" value="0">
                <input type="hidden" id="all" value="<?php echo get_data_count('students'); ?>">
            </div>
            <?php } ?>
         </div>
      </div>


<!-- boostrap model -->
<div class="modal fade" id="user-model" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <h4 class="modal-title" id="userModel"></h4>
          <a type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </a>
       </div>
       <div class="modal-body">
          <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
             <input type="hidden" name="id" id="id" value="">
             <div class="form-group">
                   <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="">
             </div>
             <div class="form-group">
                   <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="">
             </div>
             <div class="form-group">
                   <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" value="">
             </div>
             <div class="form-group">
                   <input type="text" class="form-control" id="class" name="class" placeholder="Enter Class" value="">
             </div>
             <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser">Submit
                </button>
             </div>
          </form>
       </div>
       <div class="modal-footer"></div>
    </div>
 </div>
</div>

<?php
require_once 'includes/footer.php';
?>
