import { Mark } from "tiptap";
import { updateMark, removeMark, pasteRule } from 'tiptap-commands'
import { getMarkAttrs } from 'tiptap-utils'

export default class ImageWidth extends Mark {
  get name() {
    return "imageWidth";
  }

  get defaultOptions() {
    return {
      class: null,
    }
  }

  get schema() {
    return {
      attrs: {
        class: {
          default: null,
        },
      },
      inclusive: false,
      parseDOM: [
        {
          tag: 'div[class]',
          getAttrs: dom => ({
            class: dom.getAttribute('class'),
          }),
        },
      ],
      toDOM: node => ['div', {
        ...node.attrs,
        rel: 'noopener noreferrer nofollow',
        // target: this.options.target,
      }, 0],
    };
  }

  commands({ type }) {
    return attrs => {
      if (attrs.class) {
        return updateMark(type, attrs)
      }
      return removeMark(type)
    }
  }
}
