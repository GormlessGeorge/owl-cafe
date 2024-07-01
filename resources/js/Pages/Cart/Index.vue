<template lang="">
    <section class="cart">
        <MainContainer>
            <TheHeader></TheHeader>
            <h2 class="cart__title">Оформление заказа</h2>
            <h3 class="cart__empty" v-if="!cartSize">Ваша корзина пуста</h3>
            <Button class="btn__cart" v-if="!cartSize"><Link class="cart__menu-link" href="/menu">Меню</Link></Button>
            <div class="cart__wrapper" v-if="cartSize">

                <form class="order-form">
                    <div class="order-form__contact-info block-wrapper">
                        <p class="block-wrapper__title">Контактная информация</p>
                        
                        <div class="inputs-flex">
                            <div class="input-wrapper input-wrapper__name">
                                <label for="name"></label>
                                <input name="name" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="text" required maxlength="60">
                                <p class="input-wrapper__text" ref="nameSpan">Имя получателя<span> *</span></p>
                            </div>

                            <div class="input-wrapper input-wrapper__phone">
                                <label for="phone"></label>
                                <input name="phone" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="tel" required>
                                <p class="input-wrapper__text" ref="phoneSpan">Номер телефона<span> *</span></p>
                            </div>

                            <div class="input-wrapper input-wrapper__email">
                                <label for="email"></label>
                                <input name="email" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="email" required>
                                <p class="input-wrapper__text" ref="emailSpan">E-mail<span> *</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="order-form__comment block-wrapper">
                        <p class="block-wrapper__title">Комментарий к заказу</p>
                        <textarea class="order-form__input-comment" placeholder="Текст сообщения"></textarea>
                    </div>

                    <div class="order-form__delivery-type block-wrapper">
                        <p class="block-wrapper__title">Способ доставки</p>
                        <div class="radio-buttons__flex">
                            <div class="radio" @click="shown = false">
                                 <input id="radio-1" name="delivery" type="radio" checked value="Самовывоз">
                                 <label for="radio-1" class="radio-label">Самовывоз</label>
                            </div>
                            <div class="radio radio__right" @click="shown = true">
                                 <input id="radio-2"  name="delivery" type="radio" value="Курьер">
                                 <label for="radio-2" class="radio-label">Курьер</label>
                            </div>
                        </div>
                    </div>

                    <transition name="slide">
                        <div v-if="shown" class="order-form__address  block-wrapper">
                            <p class="block-wrapper__title">Адрес доставки</p>
                            
                            <div class="inputs-flex">
                                <div class="input-wrapper input-wrapper__street">
                                    <label for="street"></label>
                                    <input name="street" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="text" required maxlength="60">
                                    <p class="input-wrapper__text">Улица<span> *</span></p>
                                </div>

                                <div class="input-wrapper input-wrapper__house">
                                    <label for="house"></label>
                                    <input name="house" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="text" required maxlength="60">
                                    <p class="input-wrapper__text">Дом<span> *</span></p>
                                </div>

                                <div class="input-wrapper input-wrapper__flat">
                                    <label for="flat"></label>
                                    <input name="flat" @focus="moveTextUp($event)" @blur="moveTextDown($event)" type="text" required maxlength="60">
                                    <p class="input-wrapper__text">Квартира<span> *</span></p>
                                </div>
                            </div>
                            
                    </div>
                    </transition>
                    

                    <div class="order-form__order-time block-wrapper">
                        <p class="block-wrapper__title">Время заказа</p>
                        <div class="radio-buttons__flex">
                            <div class="radio">
                                 <input id="radio-3" name="orderTime" type="radio" checked value="По готовности">
                                 <label for="radio-3" class="radio-label">По готовности</label>
                            </div>
                            <div class="radio radio__right">
                                 <input id="radio-4"  name="orderTime" type="radio" value="Ко времени">
                                 <label for="radio-4" class="radio-label">Ко времени</label>
                            </div>
                        </div>
                    </div>

                    <div class="order-form__payment-type block-wrapper">
                        <p class="block-wrapper__title">Способ оплаты</p>
                        <div class="radio-buttons__flex">
                        <div class="radio">
                                 <input id="radio-5" name="payment" type="radio" checked value="Онлайн">
                                 <label for="radio-5" class="radio-label">Онлайн</label>
                            </div>
                            <div class="radio radio__right">
                                 <input id="radio-6"  name="payment" type="radio"  value="Наличные при получении">
                                 <label for="radio-6" class="radio-label">Наличными</label>
                                 <p class="radio-label__cash">При получении</p>
                            </div>
                            <div class="radio radio__right">
                                 <input id="radio-7"  name="payment" type="radio"  value="Картой при получении">
                                 <label for="radio-7" class="radio-label">Картой</label>
                                 <p class="radio-label__cash">При получении</p>
                            </div>
                        </div>
                    </div>

                    <p class="cart__to-pay">К оплате: {{cartTotalAmount}}</p>
                    
                    
                    <Button btnClass="cart__create-order-btn" type="submit">Оформить заказ</Button>
                </form>
                
                

                <div class="cart__items">
                    <transition-group name="fade">
                        <div class="cart__item" v-for="cartItem in shoppingCart" :key="cartItem.menuItemId" >
                            <div class="cart__item-img">
                              <img :src="'storage/' + cartItem.imagePath">

                            </div>
                            
                              <p class="cart__item-name">{{cartItem.name}}</p>
                              
                              <p class="cart__item-weight">{{cartItem.weight + ' гр.'}}</p>
                              <p class="cart__item-price">{{cartItem.amount + ' x ' + cartItem.price + ' руб.'}}</p>
                              
                              <div class="cart__item-close-icon">
                                  <Link :href="`/remove-from-cart/${cartItem.menuItemId}`" as="button" method="get"
                              :data="{ menuItemId: cartItem.id }" preserve-state preserve-scroll> 
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_445_646)">
                              <path d="M18.557 -0.541839C18.4167 -0.682469 18.25 -0.79404 18.0665 -0.870164C17.8829 -0.946289 17.6862 -0.985473 17.4875 -0.985473C17.2889 -0.985473 17.0921 -0.946289 16.9086 -0.870164C16.7251 -0.79404 16.5584 -0.682469 16.4181 -0.541839L9 6.86105L1.58194 -0.557009C1.4415 -0.697455 1.27476 -0.808862 1.09126 -0.884871C0.907761 -0.960879 0.711086 -1 0.512466 -1C0.313846 -1 0.117171 -0.960879 -0.0663301 -0.884871C-0.249831 -0.808862 -0.416564 -0.697455 -0.557009 -0.557009C-0.697455 -0.416564 -0.808862 -0.249831 -0.884871 -0.0663301C-0.960879 0.117171 -1 0.313846 -1 0.512466C-1 0.711086 -0.960879 0.907761 -0.884871 1.09126C-0.808862 1.27476 -0.697455 1.4415 -0.557009 1.58194L6.86105 9L-0.557009 16.4181C-0.697455 16.5585 -0.808862 16.7252 -0.884871 16.9087C-0.960879 17.0922 -1 17.2889 -1 17.4875C-1 17.6862 -0.960879 17.8828 -0.884871 18.0663C-0.808862 18.2498 -0.697455 18.4166 -0.557009 18.557C-0.416564 18.6975 -0.249831 18.8089 -0.0663301 18.8849C0.117171 18.9609 0.313846 19 0.512466 19C0.711086 19 0.907761 18.9609 1.09126 18.8849C1.27476 18.8089 1.4415 18.6975 1.58194 18.557L9 11.1389L16.4181 18.557C16.5585 18.6975 16.7252 18.8089 16.9087 18.8849C17.0922 18.9609 17.2889 19 17.4875 19C17.6862 19 17.8828 18.9609 18.0663 18.8849C18.2498 18.8089 18.4166 18.6975 18.557 18.557C18.6975 18.4166 18.8089 18.2498 18.8849 18.0663C18.9609 17.8828 19 17.6862 19 17.4875C19 17.2889 18.9609 17.0922 18.8849 16.9087C18.8089 16.7252 18.6975 16.5585 18.557 16.4181L11.1389 9L18.557 1.58194C19.1335 1.00549 19.1335 0.0346154 18.557 -0.541839Z" fill="#C1C1C1"/>
                              </g>
                              <defs>
                              <clipPath id="clip0_445_646">
                              <rect width="18" height="18" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg> 
                              </Link>
                              </div>
                            <!-- <p>{{cartItem.menuItemId}}</p> -->
                         </div>
                      </transition-group>

                </div>
              </div>
            

            <!-- <Link href="clear-cart" method="get" preserve-state preserve-scroll>Очистисть корзину</Link> -->
        </MainContainer>
        
    </section>
    <TheFooter></TheFooter>
    <img class="cart__dumplings cart__dumplings-left" src="/img/dumplings1.png" alt="dumplings image">
    <img class="cart__dumplings cart__dumplings-right" src="/img/dumplings2.png" alt="dumplings image">
</template>

<script setup>
import MainContainer from "../../Layouts/MainContainer.vue";
import TheFooter from "../../Components/TheFooter.vue";
import { ref, onMounted, computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const cartTotalAmount = computed(() => page.props.cart.cartTotalAmount);
const cartSize = computed(() => page.props.cart.cartSize);
defineProps({
  shoppingCart: Object,
  // menuItems: Array
});

const mySpan = ref(null);
const shown = ref(false);

const moveTextUp = (event) => {
  event.target.nextElementSibling.classList.add("active");
};

const moveTextDown = (event) => {
  if (event.target.value === "") {
    event.target.nextElementSibling.classList.remove("active");
  }
};
</script>

<style scoped lang="scss">
.cart {
  min-height: 1200px;
  position: relative;
  padding-bottom: 100px;
  &__title {
    margin-top: 50px;
    font-size: 36px;
    font-family: "Gabriela";
    font-weight: 400;
    color: var(--text-color);
  }

  &__menu-link {
    display: flex;
    height: 100%;
    width: 100%;
    /* text-align: center; */
    justify-content: center;
    align-items: center;
  }

  &__empty {
    font-size: 20px;
  }
  &__wrapper {
    margin-top: 75px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  &__item {
    position: relative;
    display: grid;
    grid-template-columns: 90px 1fr;
    grid-template-rows: 25px 25px 30px;
    column-gap: 15px;
    row-gap: 5px;

    &-img {
      grid-column: 1 / 2;
      grid-row: 1 / 4;
      width: 90px;
      height: 90px;

      // border-radius: 10px;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
      }
    }

    &-name {
      font-size: 18px;
      font-weight: 600;
    }

    &-weight {
      // margin-top: 5px;
      font-size: 16px;
      font-weight: 300;
    }

    &-price {
      font-size: 18px;
      font-weight: 600;
    }

    &-close-icon {
      width: 25px;
      height: 25px;
      display: block;
      position: absolute;
      right: 0;

      svg {
        display: block;
        margin: 0 auto;
      }
    }
  }

  &__items {
    display: flex;
    align-self: flex-start;
    flex-direction: column;
    row-gap: 30px;
    padding: 35px;
    width: 590px;
    background-color: #f2f2f2;
    border-radius: 10px;
  }

  &__to-pay {
    margin-top: 60px;
    font-size: 24px;
    color: var(--text-color);
  }

  &__dumplings {
    display: block;
    position: absolute;
    z-index: -10;

    &-left {
      top: 30%;
      left: 0;
    }
    &-right {
      top: 30%;
      right: 0;
    }
  }
}

.active {
  transition: all 0.3s ease-in-out;
  top: -5px !important;
  font-size: 12px !important;
}

.inputs-flex {
  margin-top: 10px;
  display: flex;
  flex-wrap: wrap;
}

.input-wrapper {
  position: relative;
  width: 250px;
  height: 50px;
  &__phone {
    margin-left: 20px;
  }

  &__email {
    margin-top: 20px;
  }

  &__street {
    width: 200px;
  }
  &__house {
    width: 80px;
    margin-left: 20px;
  }
  &__flat {
    margin-left: 20px;
    width: 80px;
  }

  &__text {
    transition: all 0.3s ease-in-out;
    display: block;
    position: absolute;
    top: 16px;
    font-size: 14px;
    color: var(--input-plh-color);
    pointer-events: none;
  }

  span {
    color: var(--primary-color);
  }

  input {
    padding: 0 20px 0 0;
    height: 100%;
    width: 100%;
    border: 0;
    border-bottom: 1px solid rgba(51, 51, 51, 0.45);
    transition: all 0.3s ease-in-out;

    &:focus {
      outline: none;
      border-bottom: 1.5px solid #51a068;
      box-shadow: none;
    }
  }
}

.order-form {
  width: 590px;
  // height: 100px;

  &__contact-info {
    width: 100%;
    height: 190px;
  }

  &__comment {
    margin-top: 20px;
    width: 100%;
    height: 190px;

    textarea {
      padding: 15px 0 15px 0;
      width: 525px;
      height: 120px;
      margin-top: 10px;
      border: 0;
      border-bottom: 1px solid rgba(51, 51, 51, 0.45);
      resize: none;
      transition: all 0.3s ease-in-out;

      &:focus {
        outline: none;
        border-bottom: 1.5px solid #51a068;
        box-shadow: none;
      }
    }
  }

  &__delivery-type {
    margin-top: 20px;
    width: 100%;
    height: 120px;
  }

  &__address {
    margin-top: 20px;
    width: 100%;
    height: 130px;
  }

  &__order-time {
    margin-top: 20px;
    width: 100%;
    height: 120px;
  }

  &__payment-type {
    margin-top: 20px;
    width: 100%;
    height: 130px;
  }

  &__input-text {
    // padding: 15px 0 15px 0;
    // width: 250px;
    // height: 50px;
    border: 0;
    border-bottom: 1px solid rgba(51, 51, 51, 0.45);
    transition: all 0.3s ease-in-out;

    &:focus {
      outline: none;
      border-bottom: 1.5px solid #51a068;
      box-shadow: none;
    }
  }
}

//Wrapper block
.block-wrapper {
  padding: 15px 0 15px 15px;
  border-radius: 10px;
  border: 1px solid rgba(0, 0, 0, 0.15);

  &__title {
    color: var(--text-color);
    font-size: 18px;
    font-weight: 600;
  }
}

//Radio
.radio-buttons__flex {
  display: flex;
  flex-direction: row;
  margin-top: 25px;
  // height: 100px;
}

$color1: #ffffff;
$color2: #f96237;

.radio {
  position: relative;
  width: 155px;
  display: flex;
  flex-direction: row;
  cursor: pointer;
  &__right {
    margin-left: 45px;
  }

  input[type="radio"] {
    position: absolute;
    opacity: 0;

    + .radio-label {
      color: var(--text-color);
      cursor: pointer;
      &:before {
        content: "";
        background: $color1;
        border-radius: 100%;
        border: 1px solid darken($color1, 25%);
        display: inline-block;
        width: 1.4em;
        height: 1.4em;
        position: relative;
        margin-right: 6px;
        vertical-align: top;
        cursor: pointer;
        text-align: center;
        transition: all 500ms ease;
      }
    }

    &:checked {
      + .radio-label {
        &:before {
          background-color: $color2;
          box-shadow: inset 0 0 0 4px $color1;
        }
      }
    }

    &:focus {
      + .radio-label {
        &:before {
          outline: none;
          border-color: $color2;
        }
      }
    }

    &:disabled {
      + .radio-label {
        &:before {
          box-shadow: inset 0 0 0 4px $color1;
          border-color: darken($color1, 25%);
          background: darken($color1, 25%);
        }
      }
    }

    + .radio-label {
      &:empty {
        &:before {
          margin-right: 0;
        }
      }
    }
  }
}

.radio-label__cash {
  position: absolute;
  font-size: 12px;
  top: 22px;
  right: 38px;
  color: var(--text-color);
  font-weight: 300;
}
//Анимации

.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease-in-out;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(-100%);
  opacity: 0;
}

.slide-enter-to,
.slide-leave-from {
  transform: translateX(0);
  opacity: 1;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>