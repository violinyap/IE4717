function getAbsolutePath(path, type) {
  var currPath = window.location.href;
  var pos = currPath.indexOf("Project");
  let homePath = currPath.slice(0, pos);
  window.location.href = homePath + "Project/" + type + path;
}

// for public path: eg, Project/home.php
// use: getAbsolutePath("home.php", "")
// for patient path: eg. Project/patient/profile.php
// use getAbsolutePath("profile.php", "patient/")
// for doctor path: eg. Project/doctor/profile.php
// use getAbsolutePath("profile.php", "doctor/")
