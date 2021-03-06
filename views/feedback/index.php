<?php include ROOT . '/views/layouts/header.php'; ?>
<style>
.rating-area {
  overflow: hidden;
  width: 265px;
  margin: 0 auto;
}

.rating-area:not(:checked)>input {
  display: none;
}

.rating-area:not(:checked)>label {
  float: right;
  width: 42px;
  padding: 0;
  cursor: pointer;
  font-size: 50px;
  line-height: 50px;
  color: lightgrey;
  text-shadow: 1px 1px #bbb;
}

.rating-area:not(:checked)>label:before {
  content: '★';
}

.rating-area>input:checked~label {
  color: gold;
  text-shadow: 1px 1px #c60;
}

.rating-area:not(:checked)>label:hover,
.rating-area:not(:checked)>label:hover~label {
  color: gold;
}

.rating-area>input:checked+label:hover,
.rating-area>input:checked+label:hover~label,
.rating-area>input:checked~label:hover,
.rating-area>input:checked~label:hover~label,
.rating-area>label:hover~input:checked~label {
  color: gold;
  text-shadow: 1px 1px goldenrod;
}

.rate-area>label:active {
  position: relative;
}
</style>
<h1>Оставьте отзыв о товаре</h1>

<form method="post" action="">
  <label>Ваша оценка</label>
  <div class="rating-area">
    <input type="radio" id="star-5" name="rating" value="5">
    <label for="star-5" title="Оценка «5»"></label>
    <input type="radio" id="star-4" name="rating" value="4">
    <label for="star-4" title="Оценка «4»"></label>
    <input type="radio" id="star-3" name="rating" value="3">
    <label for="star-3" title="Оценка «3»"></label>
    <input type="radio" id="star-2" name="rating" value="2">
    <label for="star-2" title="Оценка «2»"></label>
    <input type="radio" id="star-1" name="rating" value="1">
    <label for="star-1" title="Оценка «1»"></label>
  </div>

  <label>Ваше имя<label>
      <input type="text" name="name">

      <label>Отзыв</label>
      <textarea name="text"></textarea>
</form>

<?php include ROOT . '/views/layouts/footer.php'; ?>