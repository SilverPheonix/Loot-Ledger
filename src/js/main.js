"use strict";
//General Selectors
const body = document.querySelector("body");
const inventoryContainer = document.querySelector(".character-inventory-slots");
console.log(inventoryContainer);

document.addEventListener("DOMContentLoaded", function () {
	const inventorySlots = document.querySelectorAll(".inventory-slot");

	let draggedItem = null;

	inventorySlots.forEach((slot) => {
		slot.addEventListener("dragstart", dragStart);
		slot.addEventListener("dragover", dragOver);
		slot.addEventListener("drop", drop);
	});

	function dragStart() {
		draggedItem = this;
		this.classList.add("dragging");

		// Get the slots this item occupies
		const slots = this.dataset.slot.split("-");
		slots.forEach((slot) => {
			const targetSlot = document.querySelector(`.inventory-slot[data-slot="${slot}"]`);
			targetSlot.classList.add("dragging");
		});
	}

	function dragOver(e) {
		e.preventDefault();
	}

	function drop() {
		if (draggedItem !== this) {
			const draggedSlots = draggedItem.dataset.slot.split("-");
			const targetSlots = this.dataset.slot.split("-");

			// Move the content from the dragged slots to the target slots
			draggedSlots.forEach((slot, index) => {
				const targetSlot = document.querySelector(`.inventory-slot[data-slot="${targetSlots[index]}"]`);
				targetSlot.innerHTML = document.querySelector(`.inventory-slot[data-slot="${slot}"]`).innerHTML;
			});

			// Clear the content of the dragged slots
			draggedSlots.forEach((slot) => {
				document.querySelector(`.inventory-slot[data-slot="${slot}"]`).innerHTML = "";
			});
		}

		inventorySlots.forEach((slot) => {
			slot.classList.remove("dragging");
		});

		draggedItem = null;
	}
});