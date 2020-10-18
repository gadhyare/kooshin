<?php

/**
 * fileName:    تعديل معلومات موظف
 */
?>
 
<div class="classic-tabs mx-2 p-2">
  <ul class="nav text-white danger-color-dark py-0 px-0 " id="myClassicTabShadow" role="tablist">
    <li class="nav-item py-0">
      <a class="nav-link  waves-light  text-white py-2 unique-color-dark rounded-0 btn m-0 active show" id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow" role="tab" aria-controls="profile-classic-shadow" aria-selected="true"> معلومات الموظف </a>
    </li>
    <li class="nav-item py-0">
      <a class="nav-link waves-light  text-white py-2 unique-color-dark rounded-0 btn m-0" id="follow-tab-classic-shadow" data-toggle="tab" href="#follow-classic-shadow" role="tab" aria-controls="follow-classic-shadow" aria-selected="false"> مؤهلات الموظف </a>
    </li>
    <li class="nav-item py-0">
      <a class="nav-link waves-light  text-white py-2 unique-color-dark rounded-0 btn m-0" id="contact-tab-classic-shadow" data-toggle="tab" href="#empexpe-classic-shadow" role="tab" aria-controls="empexpe-classic-shadow" aria-selected="false"> خبرات الموظف </a>
    </li>
    <li class="nav-item py-0">
      <a class="nav-link waves-light  text-white py-2 unique-color-dark rounded-0 btn m-0" id="contact-tab-classic-shadow" data-toggle="tab" href="#training-classic-shadow" role="tab" aria-controls="training-classic-shadow" aria-selected="false"> الدورات التدريبية </a>
    </li>
    <li class="nav-item py-0">
      <a class="nav-link waves-light  text-white py-2 unique-color-dark rounded-0 btn m-0" id="awesome-tab-classic-shadow" data-toggle="tab" href="#awesome-classic-shadow" role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"> الوظيفة الحالية </a>
    </li>
    <li class="nav-item py-0">
      <a class="nav-link waves-light  text-white py-2 unique-color-dark rounded-0 btn m-0" id="file-tab-classic-shadow" data-toggle="tab" href="#file-classic-shadow" role="tab" aria-controls="file-classic-shadow" aria-selected="false"> ملفات خاصة بالموظف </a>
    </li>
  </ul>

  <div class="tab-content card" id="myClassicTabContentShadow">
    <div class="tab-pane fade active show p-2" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
      <?php require 'empinfosec.php'; ?>
    </div>
    <div class="tab-pane fadeIn p-2" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
      <?php require 'empqual.php'; ?>
    </div>
    <div class="tab-pane fade" id="empexpe-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
      <?php require 'empexpe.php'; ?>
    </div>
    <div class="tab-pane fade" id="training-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
      <?php require 'emptracou.php'; ?>
    </div>
    <div class="tab-pane fade" id="awesome-classic-shadow" role="tabpanel" aria-labelledby="awesome-tab-classic-shadow">
      <?php require 'empjobs.php'; ?>
    </div>
    <div class="tab-pane fade" id="file-classic-shadow" role="tabpanel" aria-labelledby="file-tab-classic-shadow">
      <?php require 'empfiles.php'; ?>
    </div>
  </div>

</div>
<!-- Classic tabs -->