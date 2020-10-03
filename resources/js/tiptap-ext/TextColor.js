import { Mark } from "tiptap";
import { updateMark } from "tiptap-commands";

export default class TextColor extends Mark {
  get name() {
    return "text_color";
  }

  get schema() {
    return {
      attrs: {
        color: {
          default: "red"
        }
      },
      parseDOM: [
        {
          style: "color:",
          getAttrs: mark => ({ color: `${mark.attrs.color}` })
        }
      ],
      toDOM: mark => ["span", { style: `color: ${mark.attrs.color}` }, 0]
    };
  }

  commands({ type }) {
    return attrs => updateMark(type, attrs);
  }
}
