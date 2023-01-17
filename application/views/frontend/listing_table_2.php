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
<?php $i++; } } ?>