[![Build Status](https://travis-ci.org/jougene/workshop-oop.svg?branch=master)](https://travis-ci.org/jougene/workshop-oop)
# Hexlet OOP Workshop
Обсуждения и разбор кейсов, связанных с ооп, построены вокруг процесса создания утилиты командной строки. Утилита представляет из себя программу на динамическом языке, которая принимает на вход rss или atom, выполняет некоторые манипуляции (если указано) и на выходе выдает также rss или atom. В процессе возможны пребразованиф форматов rss -> atom и atom -> rss. В манипуляции входят следующие задачи:

* разворот items в обратном порядке
* сортировка по дате публикации
* Лимитирование items

Утилита выводит результат в STDOUT. Исходный feed может быть локальным файлом, так и http адресом по которому нужно его забрать.

```sh
$ convert-feed --out rss feed.xml
$ convert-feed --out atom https://ru.hexlet.io/lessons.rss
```

* Разработка ведется на одном из языков: php/js/python/ruby.
* Тесты обязательны
* Решение должно быть "ООП" в том смысле как вы его понимаете прямо сейчас.

## Keywords
* side effects
* closure
* late binding
* messaging
* abstraction
* data hiding
* data protection
* encapsulation
* inheritance
* fluent interface
* duck typing
* single layer abstraction