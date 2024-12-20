	
<style>
	.bttp {
  width: 140px;
  height: 56px;
  overflow: hidden;
  border: none;
  color: #fff;
  background: none;
  position: relative;
  padding-bottom: 2em;
}

.bttp > div,.bttp > svg {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
}

.bttp:before {
  content: "";
  position: absolute;
  height: 2px;
  bottom: 0;
  left: 0;
  width: 100%;
  transform: scaleX(0);
  transform-origin: bottom right;
  background: currentColor;
  transition: transform 0.25s ease-out;
}

.bttp:hover:before {
  transform: scaleX(1);
  transform-origin: bottom left;
}

.bttp .cloness > *,.bttp .text > * {
  opacity: 1;
  font-size: 1.3rem;
  transition: 0.2s;
  margin-left: 4px;
}

.bttp .cloness > * {
  transform: translateY(60px);
}

.bttp:hover .cloness > * {
  opacity: 1;
  transform: translateY(0px);
  transition: all 0.2s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
}

.bttp:hover .textss > * {
  opacity: 1;
  transform: translateY(-60px);
  transition: all 0.2s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
}

.bttp:hover .cloness > :nth-child(1) {
  transition-delay: 0.15s;
}

.bttp:hover .cloness > :nth-child(2) {
  transition-delay: 0.2s;
}

.bttp:hover .cloness > :nth-child(3) {
  transition-delay: 0.25s;
}

.bttp:hover .cloness > :nth-child(4) {
  transition-delay: 0.3s;
}
/* icon style and hover */
.bttp svg {
  width: 20px;
  right: 0;
  top: 50%;
  transform: translateY(-50%) rotate(-50deg);
  transition: 0.2s ease-out;
}

.bttp:hover svg {
  transform: translateY(-50%) rotate(-90deg);
}
</style>
		<hr style="color:white" class="mt-5">
		<div class="p-4" >
		<h6 class="text-white" style="float:left">© 2022-2023 BSCS3F-G3 </h6>
		<button  class="bttp" style="float:right">
    <div class="textss">
        <span><a href="#" style="color:white">Back </a></span>
        <span><a href="#" style="color:white">To </a> </span>
        <span><a href="#" style="color:white">Top </a></span>
    </div>
    <div class="cloness">
        <span><a href="#" style="color:white">Back </a></span>
        <span><a href="#" style="color:white">to </a></span>
        <span><a href="#" style="color:white">Top </a></span>
    </div>
    <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
    </svg>
</button>
		</div>