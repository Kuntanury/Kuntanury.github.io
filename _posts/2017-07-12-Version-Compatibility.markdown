---
layout:     post
title:      "The Swift Programming Language (Swift 4) 中文版 2"
subtitle:   "版本兼容"
date:       2017-07-12 10:00:00
author:     "Kuntanury"
header-img: "img/post_bg_swift.png"
catalog:    true
tags:
    - Swift
    - Translate
---
# 版本兼容

> **备注**
>
> 本书描述的是 Swift 4.0 版本，在 Xcode 9 中为 Swift 默认版本。你可以用Xcode 9来编译 Swift 3 或者 4 编写的代码。

当你用 Xcode 9 编译 Swift 3 代码的时候， Swift 4 中的大部分功能也是可用的。只有如下功能是 Swift 4 代码独有的：

Swift 对新程序员非常友好，因为它虽然是工业级编程语言，但是却又像脚本语言那样既富有表现力又生动有趣，在 Playground 中编写 Swift 代码就能实时查看运行结果，而不必经常性的编译运行程序。

Swift 采用现代编程模式来避免各种基本性编程错误：

* 拆分字符串结果可以用 Substring 取代 String 类型
* ```swift @objc ``` 修饰符可以在一些地方隐性调用
* 同一文件中类型的扩展可以访问当前类型中的私有成员

用 Swift 4 书写的 Target 可以依赖于 Swift 3 书写的 Target ，反之亦然。也就是说，如果你的工程分成了多个框架，你可以一个框架一个框架地从 Swift 3 迁移到 Swift 4 。
