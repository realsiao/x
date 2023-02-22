services.nginx = {
  enable = true;
  package = pkgs.nginx;
};

services.php = {
  enable = true;
  package = pkgs.php;
};

services.mysql = {
  enable = true;
  package = pkgs.mysql;
};

