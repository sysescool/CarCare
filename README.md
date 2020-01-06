<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="CarCare_0"></a>CarCare汽车美容管理系统</h1>
<p class="has-line-data" data-line-start="2" data-line-end="3">CarCare汽车美容管理系统是一个PHP速成系统，虽然PHP处于鄙视链最低端，但是</p>
<ul>
<li class="has-line-data" data-line-start="3" data-line-end="4">完成项目配置加学习PHP和PHPStudy三天</li>
<li class="has-line-data" data-line-start="4" data-line-end="6">两天快速搭建</li>
</ul>
<p class="has-line-data" data-line-start="6" data-line-end="7">作为工具，这真的很好用</p>
<p class="has-line-data" data-line-start="8" data-line-end="9">它面向老板和员工，可以完成一些基本功能：</p>
<ul>
<li class="has-line-data" data-line-start="10" data-line-end="11">进行你的项目，员工，顾客，车辆，车主，订单管理</li>
<li class="has-line-data" data-line-start="11" data-line-end="12">查看你的报表分析</li>
<li class="has-line-data" data-line-start="12" data-line-end="14">让一切变得简单，只需更改后端文件，和少量的前端更改</li>
</ul>
<h3 class="code-line" data-line-start=14 data-line-end=15 ><a id="Installation_14"></a>Installation</h3>
<p class="has-line-data" data-line-start="16" data-line-end="22">Requirement:<br>
A Web Server as you like.<br>
<a href="http://www.thinkphp.cn/">ThinkPHP</a> v5.1.*<br>
<a href="https://www.php.net/">PHP</a> v7+<br>
<a href="https://www.microsoft.com/zh-cn/sql-server/sql-server-downloads">SQL Server</a> Express Edition<br>
<a href="https://getcomposer.org/">Composer</a></p>
<h3 class="code-line" data-line-start=23 data-line-end=24 ><a id="Fast_installation_23"></a>Fast installation:</h3>
<p class="has-line-data" data-line-start="24" data-line-end="26"><a href="https://www.apachefriends.org/index.html">AMPP(APACHE + PHP)</a>v3.2.4 (so that you don’t need to install PHP or WebServer alone)<br>
<a href="https://docs.microsoft.com/en-us/sql/ssms/download-sql-server-management-studio-ssms?view=sql-server-ver15">Microsoft SQL Server Management Studio 18</a></p>
<pre><code class="has-line-data" data-line-start="27" data-line-end="30" class="language-sh">$ <span class="hljs-built_in">cd</span> XAMPP_DIR\htdocs
$ <span class="hljs-built_in">clone git@github.com:sysescool/CarCare.git</span> 
</code></pre>
<p class="has-line-data" data-line-start="30" data-line-end="37">edit XAMPP_DIR\apache\conf\httpd.conf<br>
Find:DocumentRoot “X:/xampp/htdocs”<br>
Replace:DocumentRoot “X:/xampp/htdocs/CarCare/public”<br>
<a href="https://docs.microsoft.com/en-us/sql/connect/php/getting-started-with-the-php-sql-driver?view=sql-server-ver15">How to connect PHP to SQL Server</a> or see more help in CarCare/docs/sql server和php环境配置.txt<br>
edit CarCare/config/database.php<br>
Run *.Sql in Directory: CarCare/sql<br>
Chrome: localhost</p>
<h3 class="code-line" data-line-start=38 data-line-end=39 ><a id="Issue_38"></a>Issue</h3>
<p class="has-line-data" data-line-start="40" data-line-end="45">这是一个快速开发系统，请不要直接用来生产<br>
没有任何json代码，采用原始form表单提交，密码在前端不会被加密<br>
侧边栏点击其他选项时，其它选项不会变红<br>
权限系统没有加入进去，员工也可以修改增加删除查看项目服务和员工页面<br>
这只是一个作业，短期内不会修改</p>
<h3 class="code-line" data-line-start=46 data-line-end=47 ><a id="Thanks_46"></a>Thanks</h3>
<p class="has-line-data" data-line-start="48" data-line-end="50">Login Pages From <a href="https://github.com/Suwings/MCSManager">MCSManager</a><br>
Basic Front Pages and Basic Code From <a href="https://github.com/ye21st/tp5.1_code">tp5.1_code</a></p>