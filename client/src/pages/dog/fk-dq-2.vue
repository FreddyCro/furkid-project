<template lang="pug">
.fk-dq2.fk-page
  .fk-container
    h3 Q{{ data.idx }} - {{ data.title }}

    .fk-dq2__option-container(v-if="!hasSubmitted")
      .fk-dq2__option(
        v-for="item in Object.keys(data.options)"
        :key="`dq-${data.idx}-${item}`"
      )
        span {{ data.options[item] }}
        input(
          :id="`dq-input-${data.idx}-${item}`"
          type="checkbox"
          :value="+item"
          v-model="myAns"
          @change="selectAnswer(multiStrategy(data.ans, myAns))"
        )

    //- submit and show answer
    fk-ans-submit(
      v-if="hasSelect"
      :has-select="hasSelect"
      :has-submitted="hasSubmitted"
      :is-correct="isCorrect"
      :submit-answer="submitAnswer"
      :cate="cate"
      :is-last="false"
    )
      fk-ans-correct(
        :question="data.title"
        illustration="/img/faker_sm.jpg"
      )
        .fk-dq2__correct-ans-container 
          .fk-dq2__correct-ans(v-for="item in data.ans" :key="item.id") {{  data.options[item] }}

      fk-ans-doctor(
        avator="/img/faker_avator.jpg"
        :name="data.doc.name"
        :title="data.doc.title"
        :say-title="data.doc.say.title"
        :say-content="data.doc.say.content"
        :source="data.doc.source"
      )

      .fk-dq2__next-wrapper
        router-link(:to="`/quiz/${cate}/${data.idx + 1}`")
          fk-btn-primary(:text="data.next")
</template>

<script>
/**
 * @mixin submitAnswer
 * data: [hasSelect, hasSubmitted, isCorrect]
 * methods: [selectAnswer, submitAnswer]
 * components: [FkAnsCorrect, FkAnsSubmit, FkAnsDoctor, FkBtnPrimary]
 */
import { submitAnswer, multiStrategy } from '@/assets/js/mixins';
import quiz from '@/assets/json/quiz-dog.json';

export default {
  name: 'DogQ2',
  data: () => ({
    data: quiz.dog2,
    cate: 'dog',
    myAns: [],
  }),
  mixins: [submitAnswer, multiStrategy],
  methods: {},
  created() {
    console.log(process.env.VUE_APP_API_ROOT);
  },
};
</script>