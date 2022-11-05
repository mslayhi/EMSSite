<?php
include "ServerConnection.php";

if(isset($_SESSION['username']) && $_SESSION['role'][0] == 'Employee'){
    header('Location: EmployeeLanding.php');
    exit();
  }
  elseif(isset($_SESSION['username']) && $_SESSION['role'][0] == 'Manager'){
    header('Location: ManagerLanding.php');
    exit();
  }
  elseif(isset($_SESSION['username']) && $_SESSION['role'][0] == 'HR'){
    header('Location: HRLanding.php');
    exit();
  }
  elseif(isset($_SESSION['username']) && $_SESSION['role'][0] == 'SiteAdmin'){
    header('Location: SiteAdminLanding.php');
    exit();
  }

?>