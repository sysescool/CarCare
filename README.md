# CarCare汽车美容管理系统

CarCare汽车美容管理系统是一个PHP速成系统，虽然PHP处于鄙视链最低端，但是
  - 完成项目配置加学习PHP和PHPStudy三天
  - 两天快速搭建

作为工具，这真的很好用

它面向老板和员工，可以完成一些基本功能：

  - 进行你的项目，员工，顾客，车辆，车主，订单管理
  - 查看你的报表分析
  - 让一切变得简单，只需更改后端文件，和少量的前端更改

### Installation

Requirement:
A Web Server as you like.
[ThinkPHP](http://www.thinkphp.cn/) v5.1.*
[PHP](https://www.php.net/) v7+
[SQL Server](https://www.microsoft.com/zh-cn/sql-server/sql-server-downloads) Express Edition
[Composer](https://getcomposer.org/)

### Fast installation:
[AMPP(APACHE + PHP)](https://www.apachefriends.org/index.html)v3.2.4 (so that you don't need to install PHP or WebServer alone)
[Microsoft SQL Server Management Studio 18](https://docs.microsoft.com/en-us/sql/ssms/download-sql-server-management-studio-ssms?view=sql-server-ver15)
```sh
$ cd XAMPP_DIR\htdocs
$ clone 
```
edit XAMPP_DIR\apache\conf\httpd.conf
Find:DocumentRoot "X:/xampp/htdocs"
Replace:DocumentRoot "X:/xampp/htdocs/CarCare/public"
[How to connect PHP to SQL Server](https://docs.microsoft.com/en-us/sql/connect/php/getting-started-with-the-php-sql-driver?view=sql-server-ver15) or see more help in CarCare/docs/sql server和php环境配置.txt
Run *.Sql in Directory: CarCare/sql
Chrome: localhost

### Issue

这是一个快速开发系统，请不要直接用来生产
没有任何json代码，采用原始form表单提交，密码在前端不会被加密
侧边栏点击其他选项时，其它选项不会变红
权限系统没有加入进去，员工也可以修改增加删除查看项目服务和员工页面
这只是一个作业，短期内不会修改

### Thanks

Login Pages From [MCSManager](https://github.com/Suwings/MCSManager)
Basic Front Pages and Basic Code From [tp5.1_code](https://github.com/ye21st/tp5.1_code)


