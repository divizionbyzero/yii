/**
 * Created by hele on 20.05.2015.
 */
var headerPhrases = [
    {phrase: "Скорее в номер! Марсиане атакуют людей!", name: "www.learn.javascript.ru"},
    {phrase: 'Дайте человеку прочитать несколько рифмованных строчек, и он возомнит себя владыкой вселенной.', name: "Рэй Бредбери"},
    {phrase: "Что значит, вы не были на Альфе Центавра? Это же всего четыре световых года отсюда.", name: "Дуглас Адамс"},
    {phrase: 'Что?! "Безвредна"? Это все, что сказано о Земле?! Одно слово!', name: "Дуглас Адамс"},
    {phrase: 'В космосе ничего не пропадает.', name: "Станислав Лем"},
    {phrase: 'Цивилизацию создают идиоты, а остальные расхлёбывают кашу.', name: "Станислав Лем"},
    {phrase: 'Сорок два! И это всё, что ты можешь сказать после семи с половиной миллионов лет работы?', name: "Дуглас Адамс"},
    {phrase: 'Стоуни нравится Марсианская Армия, потому что тут есть над чем посмеяться.', name: "Курт Воннегут"},
    {phrase: 'Если надо скрыться, нет лучшего места, чем Нью-Йорк', name: "Клиффорд Саймак"},



    ]
function randomInteger(min, max) {
    var rand = min - 0.5 + Math.random() * (max - min + 1)
    rand = Math.round(rand);
    return rand;
}
var num = randomInteger(0,headerPhrases.length);
document.querySelector(".main-header-text").textContent = (headerPhrases[num].phrase);

