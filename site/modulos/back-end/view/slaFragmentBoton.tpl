{foreach key=$keyId from=$renglonesHtml item=$html}
  <tr id="{$tipoCond}-{$keyId}">
    <td class="text-center" id="{$keyId}">
      <button class="btn bg-olive btn-flat quitar-{$tipoCond}" type="button">-</button>
    </td>
    {$html}
  </tr>
{/foreach}