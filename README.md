#duoshuo2wordpress
##将多说导出的评论转换为WP格式的sql以便于导入wordpress。 
由于多说评论要关了，又有很多朋友wordpress博客用的是多说评论。我就写了这个小程序方便把多说的数据迁移到wordpress。
###安装方法
![](https://ww2.sinaimg.cn/large/006tNbRwgy1fe7i2sb0zrj30cd06j74w.jpg)
'#(手动滑稽)
###使用方法
![](https://ww1.sinaimg.cn/large/006tNbRwgy1fe7i3worr8j309q06s74z.jpg)

多说后台这样选，导出的zip包解压，得到export.json文件，放到本程序根目录

然后执行：

```php duoshuo2wordpress.php```

会在目录下生成相应的.sql文件，以"d2w-{时间戳}.sql"命名