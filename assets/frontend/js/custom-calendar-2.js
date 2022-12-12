const date = new Date();

const renderCalendar = (action) => {
  //console.log(action)
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "Tháng 1",
    "Tháng 2",
    "Tháng 3",
    "Tháng 4",
    "Tháng 5",
    "Tháng 6",
    "Tháng 7",
    "Tháng 8",
    "Tháng 9",
    "Tháng 10",
    "Tháng 11",
    "Tháng 12",
  ];
  let currentYear = date.getFullYear();
  if(action === 2){
    if(date.getMonth() === 12){
      return currentYear = currentYear + 1;
    }
  }else if(action === 1){
    if(date.getMonth() === 0){
      return currentYear = currentYear - 1
    }
  }
  document.querySelector(".date h1").innerHTML = `${months[date.getMonth()]} - ${currentYear}`;
  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div class="day-item" onclick="activeDayItem(${i})">${i}</div>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
    monthDays.innerHTML = days;
  }
};
function activeDayItem(i){
  console.log(i)
  const classDay = this.document.querySelectorAll(`.day-item`)
  //classDay.classList.add('active-day-item')
  // console.log(classDay)
}
// document.querySelector('.day-item').onClick = function(){
//   console.log('hi')
// }



document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  const action = 1;
  renderCalendar(action);
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  const action = 2
  renderCalendar(action);
});
renderCalendar();
//scroll
window.addEventListener('scroll', function(){
  let dayBar = this.document.querySelector('.test-scroll')
  let windowPosition = window.scrollY > 120;
  dayBar.classList.toggle('test-scroll-active', windowPosition);
})


