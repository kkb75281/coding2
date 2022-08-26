hljs.highlightAll();

        //모달
        const modalBtn = document.querySelector(".modal__btn");
        const modalClose = document.querySelector(".modal__close");
        const modalCont = document.querySelector(".modal__cont");

        modalBtn.addEventListener("click", () => {
            modalCont.classList.add("show"); //애니메이션 처리 가능
            modalCont.classList.remove("hide"); 
        });

        modalClose.addEventListener("click", () => {
            modalCont.classList.add("hide");
        });


        //탭 메뉴
        const tabBtn = document.querySelectorAll(".modal__box .tabs > div");
        const tabCont = document.querySelectorAll(".modal__box .cont > div");

        tabBtn.forEach((element, index) => {
            //버튼 클릭
            element.addEventListener("click", (event) => {

                //이벤트 발생을 막아줌, 계속 0,0으로 올라가는 것 막아줌
                event.preventDefault();

                //클릭 했을 때 class active 모두 다 제거
                tabBtn.forEach(li => {
                    li.classList.remove("active");
                });

                //클릭한 버튼에는 class active 추가
                element.classList.add("active");

                //클릭 했을 때 모든 자식 박스 숨김
                tabCont.forEach(div => {
                    div.style.display = "none";
                });

                //클릭한 버튼[i]과 관련된 박스[i]만 보이게 함
                tabCont[index].style.display = "block";
            });
        });