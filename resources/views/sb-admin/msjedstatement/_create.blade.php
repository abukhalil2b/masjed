    <div class="modal fade" id="addNewMsjedstatement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-4">
                <form action="{{route('msjedstatement.store')}}" method="post">
                    @csrf
                    <div>
                        <div class="my-1">{{__('description')}}</div>
                        <input name="description" class="form-control">
                    </div>
                    <div class="mt-3">
                        <div class="my-1">{{__('amount')}}</div>
                        <input pattern="^\d*(\.\d{0,2})?$" step="2" name="amount"class="form-control">
                    </div>
                   
                    <div class="mt-3">
                        <div class="my-1">{{__('status')}}</div>
                        <select name="status" class="form-control p-0">
                            <option value="in">{{__('in')}}</option>
                            <option value="out">{{__('out')}}</option>
                        </select>
                    </div>
                    <small class="text-success">بواسطة: {{auth()->user()->name}}</small>
                    <button class="btn text-primary mt-3 float-left">{{__('Save')}}</button>
                    <button class="btn text-secondary mt-3 float-right" type="button" data-dismiss="modal">{{__('Cancel')}}</button>
                </form>
            </div>
        </div>
    </div>