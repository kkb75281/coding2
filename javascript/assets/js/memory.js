// 01 HTML/CSS 디자인 구성
// 02 클릭한 카드 뒤집기
// 03 두개의 카드 뒤집은 결과 확인하기

const memoryWrap = document.querySelector(".memory__wrap");
const memoryCards = memoryWrap.querySelectorAll(".cards li");
const times = memoryWrap.querySelectorAll(".memory__inner .times");

let cardOne, cardTwo;
let disableDeck = false;
let matchedCard = 0;

let sound = [
  "../assets/audio/match.m4a",
  "../assets/audio/unmatch.m4a",
  "../assets/audio/success.m4a",
];
let soundMatch = new Audio(sound[0]);
let soundUnMatch = new Audio(sound[1]);
let soundSuccess = new Audio(sound[2]);

// 카드 뒤집기
function flipCard(e) {
  let clickedCard = e.target;

  if (clickedCard !== cardOne && !disableDeck) {
    clickedCard.classList.add("flip");

    if (!cardOne) {
      return (cardOne = clickedCard);
    }
    cardTwo = clickedCard;
    disableDeck = true;

    let cardOneImg = cardOne.querySelector(".back img").src;
    let cardTwoImg = cardTwo.querySelector(".back img").src;

    matchCards(cardOneImg, cardTwoImg);
  }
}

// 뒤집은 카드끼리 확인
function matchCards(img1, img2) {
  if (img1 == img2) {
    // 같을 경우
    matchedCard++;

    if (matchedCard == 8) {
      alert("game over");
      soundSuccess.play();
    }
    cardOne.removeEventListener("click", flipCard);
    cardTwo.removeEventListener("click", flipCard);
    cardOne = cardTwo = "";
    disableDeck = false;

    soundMatch.play();
  } else {
    // 일치하지 않는 경우 이미지 좌우로 흔들리게
    setTimeout(() => {
      cardOne.classList.add("shakeX");
      cardTwo.classList.add("shakeX");
    }, 500);

    setTimeout(() => {
      cardOne.classList.remove("shakeX", "flip");
      cardTwo.classList.remove("shakeX", "flip");
      cardOne = cardTwo = "";
      disableDeck = false;
    }, 1600);

    // times.forEach(function())

    // times.forEach(function (time) {
    //   time.classList.add("error");
    // });

    for (i = 5; i <= 0; i--) {
      $(".memory__inner .times:nth-child(i)").classList.add("error");
      i--;
    }

    soundUnMatch.play();
  }
}

// 카드 섞기
function shuffleCard() {
  cardOne = cardTwo = "";
  disableDeck = false;
  matchedCard = 0;

  let arr = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8];
  let result = arr.sort(() => (Math.random() > 0.5 ? 1 : -1));

  memoryCards.forEach((card, index) => {
    card.classList.remove("flip");

    setTimeout(() => {
      card.classList.add("flip");
    }, 200 * index);

    setTimeout(() => {
      card.classList.remove("flip");
    }, 4000);

    let imgTag = card.querySelector(".back img");
    imgTag.src = `../assets/img/memory_card_${arr[index]}.png`;
  });
}

shuffleCard();

// 카드를 클릭했을 때
memoryCards.forEach((card) => {
  card.addEventListener("click", flipCard);
});
