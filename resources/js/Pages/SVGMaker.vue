<template>
    <div style="height: 100vh; display: flex; flex-direction: column">
        <header
            style="
                background: #f8f9fa;
                padding: 10px;
                max-height: 30vh;
                overflow: auto;
            "
        >
            <h1>Cat SVG Editor</h1>
            <div>
                <label
                    >Head Start:
                    <input
                        v-model.number="headStart"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ headStart }}</label
                >
                <label
                    >Head Mid:
                    <input
                        v-model.number="headMid"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ headMid }}</label
                >
                <label
                    >Head End:
                    <input
                        v-model.number="headEnd"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ headEnd }}</label
                >
                <label
                    >Body Mid:
                    <input
                        v-model.number="bodyMid"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ bodyMid }}</label
                >
                <label
                    >Eye Y:
                    <input
                        v-model.number="eyeY"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ eyeY }}</label
                >
                <label
                    >Left Eye X:
                    <input
                        v-model.number="leftEyeX"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ leftEyeX }}</label
                >
                <label
                    >Right Eye X:
                    <input
                        v-model.number="rightEyeX"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ rightEyeX }}</label
                >
                <label
                    >Ear Mid:
                    <input
                        v-model.number="earMid"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ earMid }}</label
                >
                <label
                    >Left Ear Start:
                    <input
                        v-model.number="leftEarStart"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ leftEarStart }}</label
                >
                <label
                    >Left Ear End:
                    <input
                        v-model.number="leftEarEnd"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ leftEarEnd }}</label
                >
                <label
                    >Right Ear Start:
                    <input
                        v-model.number="rightEarStart"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ rightEarStart }}</label
                >
                <label
                    >Right Ear End:
                    <input
                        v-model.number="rightEarEnd"
                        type="range"
                        min="0"
                        max="30"
                    />
                    {{ rightEarEnd }}</label
                >
            </div>
        </header>
        <div
            style="
                flex-grow: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: auto;
            "
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                <defs>
                    <!-- Gradient definition here -->
                </defs>
                <g fill="url(#rainbow)" stroke="black" stroke-width="2">
                    <path
                        :d="`M${headStart} Q${headMid} ${headEnd} Q${bodyMid} ${headStart}`"
                    />
                    <!-- Head -->
                    <path
                        :d="`M${leftEyeX} ${eyeY} Q${leftEyeX + 1} ${
                            eyeY - 1
                        }, ${leftEyeX + 2} ${eyeY}`"
                        fill="black"
                    />
                    <!-- Left eye -->
                    <path
                        :d="`M${rightEyeX} ${eyeY} Q${rightEyeX + 1} ${
                            eyeY - 1
                        }, ${rightEyeX + 2} ${eyeY}`"
                        fill="black"
                    />
                    <!-- Right eye -->
                    <polygon
                        :points="`${leftEarStart} ${earMid} ${leftEarEnd}`"
                        fill="black"
                    />
                    <!-- Left ear -->
                    <polygon
                        :points="`${rightEarStart} ${earMid} ${rightEarEnd}`"
                        fill="black"
                    />
                    <!-- Right ear -->
                </g>
            </svg>
        </div>
    </div>
</template>
<script setup>
import { ref } from "vue";

const headStart = ref(10);
const headMid = ref(15);
const headEnd = ref(20);
const bodyMid = ref(15);
const eyeY = ref(17);
const leftEyeX = ref(13);
const rightEyeX = ref(17);
const earMid = ref(15);
const leftEarStart = ref(10);
const leftEarEnd = ref(14);
const rightEarStart = ref(20);
const rightEarEnd = ref(16);
</script>
