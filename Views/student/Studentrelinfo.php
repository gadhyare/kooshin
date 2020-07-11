<a href="<?php echo ROOT_URL ;?>/student/Studentrel/<?php echo $_GET['id'];?>"  target="_blank" class="btn success-color-dark text-white mt-2 float-left rounded-0 mb-2 p-2">
       <i class="fa fa-plus" aria-hidden="true"></i> اضافة قريب جديد </a>
        <table class="table tables  ">
            <?php $ops = new Khas() ;?>
          <thead>
            <tr>
              <th class="p-1 bg-dark text-white" > المسلسل</th>
              <th class="p-1 bg-dark text-white" > اسم القريب </th>
              <th class="p-1 bg-dark text-white" > صلة القرابة </th>
              <th class="p-1 bg-dark text-white" > درجة القرابة</th>
              <th class="p-1 bg-dark text-white" > العنوان </th>
              <th class="p-1 bg-dark text-white" > الإيميل </th>
              <th class="p-1 bg-dark text-white" > العنوان </th>

              <th class="p-1 bg-dark text-white" colspan="2" >الهواتف</th>
            </tr>
          </thead>
          <tbody>
                <?php $i = 1;?>
                <?php $rt = $ops->getStuRelInfo();?>
                <?php foreach ((array) $rt as $relInfo) : ?>
                    <tr>
                    <td  class="p-1"  ><?php echo $i;?></td>
                    <td  class="p-1"  style="font-size:90%;"><?php echo $relInfo['rel_name'];  ?></td>
                    <td  class="p-1"  >
                       
                        <?php echo $relInfo['rel_type'];;?> </td>
                    <td  class="p-1"  ><?php echo $relInfo['rel_lev'];;?> </td>
                    <td  class="p-1"  ><?php echo $relInfo['rel_Address'];;?> </td>
                    <td  class="p-1"  ><?php echo $relInfo['rel_email'];;?> </td>
                    <td  class="p-1"  ><?php echo $relInfo['rel_phones'];;?> </td>
                    <td  class="p-1 text-left"  > 
                          <a href="<?php echo ROOT_URL;?>/student/Studentrelupdate/<?php echo $relInfo['Rel_id'];?>" target="_blanck" class="px-2 success-color-dark text-white ml-1" > <i class="fa fa-pencil" aria-hidden="true"></i>  </a>
                          <a href="<?php echo ROOT_URL;?>/student/Studentreldel/<?php echo $relInfo['Rel_id'];?>" target="_blanck" class="px-2 bg-danger text-white ml-1" > <i class="fa fa-trash-o" aria-hidden="true"></i>  </a>
                    </td>
                  </tr>
                  <?php 
                  $i++;
                endforeach ; ?>
         </tbody>
        </table>
  